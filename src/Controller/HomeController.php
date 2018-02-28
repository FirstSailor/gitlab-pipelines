<?php

/**
 * Created by Rokas Mikalkėnas
 * mikalkenas@gmail.com
 */

namespace App\Controller;

use App\Model\Group;
use App\Model\Pipeline;
use App\Model\Project;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractBaseController
{
    /**
     * @return Response
     */
    public function listGroupsAction(): Response
    {
        try {
            $groups = $this->getSerializer()->fromArray(
                $this->getGitlabClient()->groups->all(),
                \sprintf('array<%s>', Group::class)
            );
        } catch (\Exception $e) {
            $groups = [];
        }

        return $this->render('groups/list.html.twig', ['groups' => $groups]);
    }

    /**
     * @param int $groupId
     * @return Response
     */
    public function listGroupsPipelinesAction(int $groupId): Response
    {
        try {
            $projects = $this->getSerializer()->fromArray(
                $this->getGitlabPager()->fetchAll($this->getGitlabClient()->groups(), 'projects', [$groupId]),
                \sprintf('array<%s>', Project::class)
            );
        } catch (\Exception $e) {
            $projects = [];
        }

        /** @var Project $project */
        foreach ($projects as $project) {
            $pipelines = $this->getSerializer()->fromArray(
                $this->getGitlabPager()->fetch($this->getGitlabClient()->projects(), 'pipelines', [$project->getId()]),
                \sprintf('array<%s>', Pipeline::class)
            );

            $project->setPipelines($pipelines);
        }

        \usort(
            $projects,
            function (Project $project1, Project $project2) {
                return \count($project2->getPipelines()->getActive()) <=> \count($project1->getPipelines()->getActive());
            }
        );

        return $this->render('pipelines/index.html.twig', ['projects' => $projects]);
    }
}
