<?php

namespace App\Policies;

use App\Article;
use App\User;

class ArticlePolicy
{
    public function createComment(User $user, Article $article)
    {
        return true;
    }
}
