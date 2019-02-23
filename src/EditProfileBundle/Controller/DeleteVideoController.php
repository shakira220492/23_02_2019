<?php

namespace EditProfileBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class DeleteVideoController extends Controller
{
    public function deleteVideoAction(Request $request)
    {
        $videoId = $_POST['videoId'];
        $em = $this->getDoctrine()->getManager();
            
        if ($request->isXMLHttpRequest()) {
            $todayDate = date("Y-m-d");
            $nextMonthDate = strtotime('+30 day', strtotime($todayDate));
            $nextMonthDate_v2 = date ("Y-m-d", $nextMonthDate);
            $deleteRequestDate = date_create_from_format('Y-m-d', $nextMonthDate_v2);
            
            $video = $em->getRepository('HomeBundle:Video')->findOneByVideoId($videoId);
            
            $deleteVideoRequest = new \HomeBundle\Entity\Deletevideorequest();
            $deleteVideoRequest->setDeletevideorequestDatetodelete($deleteRequestDate);
            $deleteVideoRequest->setVideo($video);
            $em->persist($deleteVideoRequest);
            $em->flush();
            
            $users2 = array();
            $users2[0] = array(
                'variable' => "funciona"
            );
            return new Response(json_encode($users2), 200, array('Content-Type' => 'application/json'));
        }
    }
    
}