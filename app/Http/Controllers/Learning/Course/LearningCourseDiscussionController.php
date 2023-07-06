<?php

namespace App\Http\Controllers\Learning\Course;

use App\Http\Controllers\Controller;
use App\Http\Resources\Learning\Course\CourseDiscussionResource;
use App\Services\Base\BaseService;
use App\Services\Course\CourseDiscussionService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LearningCourseDiscussionController extends Controller
{
    protected CourseDiscussionService $discussion;
    public function __construct(CourseDiscussionService $discussion){
        $this->discussion = $discussion;
    }

    public function index(Request $request): \Illuminate\Http\JsonResponse
    {
        try{
            $data = $this->discussion->discussionsByCourseId($request->course_id)
                ->latest()->paginate(10);
            return response()->json([
                'success' => true,
                'comments' => CourseDiscussionResource::collection($data)->response()->getData(true),
            ]);

        }catch(Exception $e){
            return BaseService::tryCatchException($e);
        }
    }

    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        try{
            $data = $this->discussion->storeComment($request, Auth::user()->id);
            return response()->json($data);

        }catch(Exception $e){
            return BaseService::tryCatchException($e);
        }
    }

    public function destroy(Request $request): \Illuminate\Http\JsonResponse
    {
        try{
            $this->discussion->deleteComment($request->comment_id, Auth::user()->id);
            return response()->json([
                'success' => true,
            ]);

        }catch(Exception $e){
            return BaseService::tryCatchException($e);
        }
    }

    public function liked(Request $request): ?\Illuminate\Http\JsonResponse
    {
        try{
            $liked = $this->discussion->likedByUser(
                Auth::user()->id,
                $request->course_id,
                $request->comment_id
            );

            if($liked){
                return response()->json([
                    'success' => true,
                ]);
            }
            return null;

        }catch(Exception $e){
            return BaseService::tryCatchException($e);
        }
    }

    public function likeComment(Request $request): \Illuminate\Http\JsonResponse
    {
        try{
            $data = $this->discussion->likeComment(
                Auth::user()->id,
                $request->course_id,
                $request->comment_id
            );
            return response()->json($data);

        }catch(Exception $e){
            return BaseService::tryCatchException($e);
        }
    }

}
