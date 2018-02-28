<?php

/**
 * Created by Rokas Mikalkėnas
 * mikalkenas@gmail.com
 */

namespace App\Controller;

use Gitlab\Client;
use Gitlab\ResultPager;
use JMS\Serializer\Serializer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

abstract class AbstractBaseController extends Controller
{
    /**
     * @return ResultPager
     */
    protected function getGitlabPager(): ResultPager
    {
        return $this->get('gitlab_api_pager');
    }

    /**
     * @return Client
     */
    protected function getGitlabClient(): Client
    {
        return $this->get('gitlab_api');
    }

    /**
     * @return Serializer
     */
    protected function getSerializer(): Serializer
    {
        return $this->get('jms_serializer');
    }
}
