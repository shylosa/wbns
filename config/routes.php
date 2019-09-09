<?php

use wbns\Router;

Router::add('^post$', ['controller' => 'Comment', 'action' => 'index']);

// default routes
Router::add('^$', ['controller' => 'Post', 'action' => 'index']);
//Router::add('^([a-z-]+)\.([a-z-]+)$', ['controller' => 'Post', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');