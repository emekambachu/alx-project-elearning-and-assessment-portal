<?php

namespace App\Services\Module;

use App\Http\Resources\Learning\Module\AdminModuleResource;
use App\Models\Learning\Module\BraceModule;
use App\Models\Learning\Module\BraceModuleView;
use App\Services\Base\CrudService;
use Illuminate\Support\Facades\File;

class ModuleService
{
    protected string $imagePath = 'photos/module';

    public function braceModule(): BraceModule
    {
        return new BraceModule();
    }

    public function braceModuleView(): BraceModuleView
    {
        return new BraceModuleView();
    }

    public function moduleWithRelations(): \Illuminate\Database\Eloquent\Builder
    {
        return $this->braceModule()->with('courses', 'module_views', 'assignments', 'assessment');
    }

    public function moduleById($id)
    {
        return $this->moduleWithRelations()->findOrFail($id);
    }

    public static function previousModuleCompleted($userId, $currentModuleSort, $previousModuleId): bool
    {
        // get previous module, iterate module_views relationships, get user_id, module_id and status
        $previous = self::getPreviousModule($currentModuleSort);
        $completedPreviousAssessment = (new ModuleService)->braceModuleView()->where([
            ['brace_module_id', $previousModuleId],
            ['user_id', $userId],
            ['status', 1],
        ])->first();

        if($previous && $completedPreviousAssessment){
            return true;
        }
        return false;
    }

    public static function getNextModule($currentModuleSort){
        $next = BraceModule::with('module_views', 'courses')
            ->where('sort', '>',  $currentModuleSort)
            ->orderBy('sort')->first();

        if(!$next){
            return false;
        }
        return $next;
    }

    public static function getPreviousModule($currentModuleSort){
        $previous = BraceModule::with('module_views', 'courses')
            ->where('sort', '<',  $currentModuleSort)
            ->orderBy('sort', 'desc')->first();

        if(!$previous){
            return false;
        }
        return $previous;
    }

    public function storeModule($request): array
    {
        $inputs = $request->all();
        // update status and upload files
        $inputs['status'] = $inputs['status'] === "1" ? 1 : 0;
        $inputs['image'] = CrudService::uploadAndCompressImage($request, $this->imagePath, null, null, 'image');
        $inputs['image_path'] = config('app.app_url').'/'.$this->imagePath.'/';

        $module = $this->braceModule()->create($inputs);
        return [
            'success' => true,
            'module' => new AdminModuleResource($module)
        ];
    }

    public function updateModule($request): array
    {
        $inputs = $request->all();
        $module = $this->moduleById($request->id);

        $inputs['status'] = $inputs['status'] === "1" ? 1 : 0;
        $inputs['sort'] = (int)$inputs['sort'];
        if(!empty($inputs['image']) && $inputs['image'] !== "null"){
           $inputs['image'] = CrudService::uploadAndCompressImage($request, $this->imagePath, null, null, 'image');
        }else{
           $inputs['image'] = $module->image;
        }

        $module->update($inputs);
        return [
            'success' => true,
            'module' => new AdminModuleResource($module)
        ];
    }

    public function deleteModule($request): array
    {
        $module = $this->moduleById($request->id);
        if(!empty($module->image) && File::exists(public_path() . '/'.$this->imagePath.'/' . $module->image)){
            FILE::delete(public_path() . '/'.$this->imagePath.'/' . $module->image);
        }
        $module->delete();

        return [
            'success' => true,
            'message' => 'deleted'
        ];
    }
}
