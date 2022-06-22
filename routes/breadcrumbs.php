<?php

use App\Models\User;
use App\Models\Agent;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('user.index', function (BreadcrumbTrail $trail):void {
    $trail->push('User ', route('user.index'));
});

Breadcrumbs::for('user.show', function (BreadcrumbTrail $trail, User $user) {
    $trail->parent('user.index');
    $trail->push($user->id, route('user.show', $user));
});

Breadcrumbs::for('user.create', function (BreadcrumbTrail $trail) {
    $trail->parent('user.index');
    $trail->push('Create User', route('user.create'));
});

Breadcrumbs::for('user.edit', function (BreadcrumbTrail $trail,User $user) {
    $trail->parent('user.index');
    $trail->push('Edit User', route('user.edit',$user));
});


//agent
Breadcrumbs::for('agent.index', function (BreadcrumbTrail $trail):void {
    $trail->push('Agent ', route('agent.index'));
});

Breadcrumbs::for('agent.show', function (BreadcrumbTrail $trail, Agent $agent) {
    $trail->parent('agent.index');
    $trail->push($agent->id, route('agent.show', $agent));
});

Breadcrumbs::for('agent.create', function (BreadcrumbTrail $trail) {
    $trail->parent('agent.index');
    $trail->push('Create Agent', route('agent.create'));
});

Breadcrumbs::for('agent.edit', function (BreadcrumbTrail $trail,Agent $agent) {
    $trail->parent('agent.index');
    $trail->push('Edit Agent', route('agent.edit',$agent));
});

Breadcrumbs::after(function (BreadcrumbTrail $trail) {
    $page = (int) request('page', 1);
    
    if ($page > 1) {
        $trail->push("Page {$page}", null, ['current' => false]);
    }
});