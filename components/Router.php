<?php

class Router
{
	private $routes;
	private $request_status = false;

	public function __construct()
	{
		if (!empty($_SESSION['user_id']))
			$routPath = ROOT.'/config/user_routes.php';
		else
			$routPath = ROOT.'/config/guest_routes.php';
		$this->routes = include($routPath);
	}

	public function  page_not_found()
	{
		include_once(ROOT.'/views/notFound.php');
		exit;
	}

	private function getURI()
	{
		if (!empty($_SERVER['REQUEST_URI']))
		{
			return trim($_SERVER['REQUEST_URI'], '/');
		}
		return null;
	}

	public function run()
	{
		//Get request string
		$uri = $this->getURI();

		//Check the value of the request
		foreach ($this->routes as $pattern => $path)
		{
			if (preg_match("~(/|^){$pattern}/?$~", $uri))
			{
				$internalRoute = preg_replace("~{$pattern}~", $path, $uri);
				//Determine controller, action, params
				$segments = explode('/', $internalRoute);
				$controllerName = ucfirst(array_shift($segments).'Controller');
				$actionName = 'action'.ucfirst(array_shift($segments));
				$params = $segments;

				//Connecting controller class
				$controllerFile = ROOT.'/controllers/'.$controllerName.'.php';
				if (file_exists($controllerFile))
					include_once($controllerFile);
				else
					$this->page_not_found();
				//Create controller object
				$controllerObject = new $controllerName;
				//Call controller's action
				$result = call_user_func_array(array($controllerObject, $actionName), $params);
				if ($result)
				{
					$this->request_status = true;
					break;
				}
			}
		}
		if ($this->request_status === false)
			$this->page_not_found();
	}
}
