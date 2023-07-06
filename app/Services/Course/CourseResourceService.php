<?php

namespace App\Services\Course;

use App\Http\Resources\Learning\Course\CourseResourceResource;
use App\Models\Learning\Course\CourseResource;
use App\Services\Base\CrudService;
use Illuminate\Support\Facades\File;

class CourseResourceService
{
    protected string $documentPath = 'documents/courses/resources';

    public function courseResource(): CourseResource
    {
        return new CourseResource();
    }

    public function resourceWithRelations(): \Illuminate\Database\Eloquent\Builder
    {
        return $this->courseResource()->with('course', 'module');
    }

    public function resourceById($id)
    {
        return $this->resourceWithRelations()->findOrFail($id);
    }

    public function resourcesByCourseId($courseId): \Illuminate\Database\Eloquent\Builder
    {
        return $this->resourceWithRelations()->where('brace_course_id', $courseId);
    }

    public function storeResource($request): array
    {
        $inputs = $request->all();

        if(empty($inputs['document']) && empty($inputs['url'])){
            return [
                'success' => false,
                'form_error' => 'Upload a document or add a url'
            ];
        }

        $inputs['document'] = CrudService::uploadAnyFile($request, $this->documentPath, 'document');
        $inputs['document_path'] = config('app.app_url').'/'.$this->documentPath.'/';
        $resource = $this->courseResource()->create($inputs);

        return [
            'success' => true,
            'resource' => new CourseResourceResource($resource)
        ];
    }

    public function updateResource($request): array
    {
        $inputs = $request->all();
        $resource = $this->resourceById($request->id);

        // If document is uploaded and not a string
        if(isset($inputs['document']) && !is_string($inputs['document'])){
            $inputs['document'] = CrudService::uploadAnyFile($request, $this->documentPath, 'document');
        }else{
            $inputs['document'] = $resource->document;
        }
        $resource->update($inputs);

        return [
            'success' => true,
            'resource' => new CourseResourceResource($resource)
        ];
    }

    public function deleteResource($id): array
    {
        $resource = $this->resourceById($id);
        if(!empty($resource->document) && File::exists(public_path() . '/'.$this->documentPath.'/' . $resource->document)){
            FILE::delete(public_path() . '/'.$this->documentPath.'/' . $resource->image);
        }
        $resource->delete();

        return [
            'success' => true,
            'message' => 'Deleted'
        ];
    }
}
