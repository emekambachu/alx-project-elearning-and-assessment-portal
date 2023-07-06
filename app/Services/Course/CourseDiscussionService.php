<?php

namespace App\Services\Course;

use App\Http\Resources\Learning\Course\CourseDiscussionResource;
use App\Models\Learning\Course\CourseDiscussion;
use App\Models\Learning\Course\CourseDiscussionLike;

class CourseDiscussionService
{
    public function courseDiscussion(): CourseDiscussion
    {
        return new CourseDiscussion();
    }

    public function courseDiscussionLike(): CourseDiscussionLike
    {
        return new CourseDiscussionLike();
    }

    public function discussionWithRelations(): \Illuminate\Database\Eloquent\Builder
    {
        return $this->courseDiscussion()->with('module', 'course', 'replies', 'user');
    }

    public function discussionById($id)
    {
        return $this->discussionWithRelations()->findOrFail($id);
    }

    public function discussionsByCourseId($courseId): \Illuminate\Database\Eloquent\Builder
    {
        return $this->discussionWithRelations()->where('brace_course_id', $courseId);
    }

    public function storeComment($request, $userId): array
    {
        $inputs = $request->all();
        $inputs['user_id'] = $userId;

        $comment = $this->discussionWithRelations()->create($inputs);
        return [
            'success' => true,
            'comment' => new CourseDiscussionResource($comment),
            'message' => 'Comment Submitted'
        ];
    }

    public function deleteComment($commentId, $userId): array
    {
        $this->courseDiscussion()->where([
            ['user_id' => $userId],
            ['id' => $commentId]
        ])->delete();

        return [
            'success' => true,
            'message' => 'Comment Deleted'
        ];
    }

    public function likedByUser($userId, $courseId, $commentId)
    {
        return $this->courseDiscussionLike()->where([
            ['user_id', $userId],
            ['brace_course_id', $courseId],
            ['course_discussion_id', $commentId],
        ])->first();
    }

    public function likeComment($userId, $courseId, $commentId): array
    {
        $liked = $this->likedByUser($userId, $courseId, $commentId);
        if(!$liked){
           $this->courseDiscussionLike()->create([
               'user_id' => $userId,
               'brace_course_id' => $courseId,
               'course_discussion_id' => $commentId
           ]);

           return [
             'success' => true,
             'message' => 'liked',
           ];
        }else{

            $this->courseDiscussionLike()->where([
                ['user_id', $userId],
                ['brace_course_id', $courseId],
                ['course_discussion_id', $commentId],
            ])->delete();

            return [
                'success' => true,
                'message' => 'unliked',
            ];
        }
    }

}
