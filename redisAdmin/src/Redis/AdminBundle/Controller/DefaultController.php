<?php

namespace Redis\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        
    	$redis = $this->container->get('snc_redis.default');
		/*$val = $redis->set('blub','value1');
		$val = $redis->set('argh','value2');
		$val = $redis->set('dum','value3');*/
		$value = $redis->info();



		//return $this->render('RedisAdminBundle:Default:index.html.twig', array('redis' => http_build_query($value)) );
		return $this->render('RedisAdminBundle:Default:index.html.twig', array('redis' => $value) );
    }

    public function showAction($db)
    {
        if ($db == 0) { $tmpdb = "FirstDB"; }
        elseif ($db == 1) { $tmpdb = "SecondDB"; }
        elseif ($db == 2) { $tmpdb = "Second2DB"; }
        elseif ($db == 3) { $tmpdb = "Second3DB"; }
        elseif ($db == 4) { $tmpdb = "Second4DB"; }
        elseif ($db == 5) { $tmpdb = "Second5DB"; }
        elseif ($db == 6) { $tmpdb = "Second6DB"; };


    	$redis = $this->container->get('snc_redis.default');
		/*$val = $redis->set('blub','value1');
		$val = $redis->set('argh','value2');
		$val = $redis->set('dum','value3');*/
		$redis->select($db); /* 'string' */

		$value = $redis->keys('*');

		//return $this->render('RedisAdminBundle:Default:index.html.twig', array('redis' => http_build_query($value)) );
		return $this->render('RedisAdminBundle:Default:show.html.twig', array('redis' => $value,'db' => $db, 'tmpdb' => $tmpdb) );
    }

    public function detailsAction($db,$key)
    {
        
    	$redis = $this->container->get('snc_redis.default');
		/*$val = $redis->set('blub','value1');
		$val = $redis->set('argh','value2');
		$val = $redis->set('dum','value3');*/
		$redis->select($db); /* 'string' */

		$value = $redis->keys('*');
		$detail = $redis->get($key);

		//return $this->render('RedisAdminBundle:Default:index.html.twig', array('redis' => http_build_query($value)) );
		return $this->render('RedisAdminBundle:Default:show.html.twig', array('redis' => $value, 'detail' => $detail, 'db' => $db)  );
    }

}
