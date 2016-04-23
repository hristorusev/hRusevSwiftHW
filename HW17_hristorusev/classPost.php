<?php
 class ClassPost
{
   protected $id;
   protected $post;
   protected $created_at;
   protected $updated_at;
   protected $auther;
   protected $comments;
   function __construct($data)
      {
          $this->id = (isset($data['id'])) ? $data['id'] : NULL;
          $this->post = (isset($data['post'])) ? $data['post'] : NULL;
          $this->created_at = (isset($data['created_at'])) ? $data['created_at'] : NULL;
          $this->updated_at = (isset($data['updated_at'])) ? $data['updated_at'] : NULL;
          //var_dump($data['auther']);
          $this->auther = (isset($data['auther']) && is_a($data['auther'], 'ClassUser')) ? $data['auther'] : NULL; 
          $comments = array(); 
      }
   public function savePostInDB()
      {
         if(isset($this->id))
            {
               echo "This post exist!<br/>";
            }
         else
            {
               $newDatabaseConnection = new ClassDatabase();
               $saveArray = array('id' => $this->id,
                                  'user_id' => $this->auther->getId(),
                                  'post' => $this->post,
                                  'created_at' => $this->created_at,
                                  'updated_at' => $this->updated_at);
               $id = $newDatabaseConnection->isnertInDB('posts',$saveArray);
               $this->id = ($id!=-1) ? $id : NULL;
               $newDatabaseConnection->closeDBconection();
              // echo "Successfully insert post with $id id!<br/>";
            }

      }
   public function getPostInfoFromDB()
      { 
         $newDatabaseConnection = new ClassDatabase();
         $searchArray = array('id' => $this->id,
                                  'user_id' => NULL,
                                  'post' => $this->post,
                                  'created_at' => $this->created_at,
                                  'updated_at' => $this->updated_at);
         $returnInfo = $newDatabaseConnection->selectFromDB('posts',$searchArray);
         if(count($returnInfo)==1)
               {
                  foreach ($returnInfo as $singlePostInfo) 
                     {
                           foreach ($singlePostInfo as $key => $value) 
                           {
                              if($key=='user_id')
                                 {
                                    $singleUser = new ClassUser(array('id'=>$value));
                                    $singleUser->getUserInfoFromDB();
                                    $this->auther = $singleUser; 
                                 }
                              else
                                 {
                                    $this->$key = $value;
                                 }
                           }
                     }
               }
         $newDatabaseConnection->closeDBconection();
      }
   public function addPostComment($data)
      {
         $data = $data;
         $data['post_id'] = $this->id;
         $singleComment = new ClassComment($data);
         $singleComment->saveCommentInDB();
         $this->comments[]=$singleComment; 
      }
   public function searchCommentsForPost()
      {
         $newDatabaseConnection = new ClassDatabase();
         $searchArray = array('id' => NULL,
                              'post_id' => $this->id);
         $newDatabaseConnection = new ClassDatabase();
         $returnInfo = $newDatabaseConnection->selectFromDB('comments',$searchArray);
         //echo '<pre>';
         //var_dump($returnInfo);
         if(count($returnInfo)>=1)
               {
                  //echo 'POST '.$this->id.'<br/>';
                  foreach ($returnInfo as $singleCommentInfo) 
                     {
                           $singleComment = new ClassComment($singleCommentInfo);
                           $singleComment->getCommentInfoFromDB();
                           if (!isset($this->comments) || !in_array($singleComment, $this->comments)) 
                              {
                                 $this->comments[] = $singleComment;
                              }
                           //echo '<pre>';
                           //var_dump( $singleComment);
                     }

               }
         $newDatabaseConnection->closeDBconection();
      }
   public function displayPostInfo()
      {
         echo '<h2>AUTHER:</h2>';
         echo '<h3>'.$this->auther->getFirst_name().' '.$this->auther->getFirst_name().'</h3>';
         echo '<h5>POST TEXT:</h5>';
         echo '<p>'.$this->post.'</p>';
         echo '<ul>';
         echo '<h5>POST COMMENTS:</h5>';
         foreach ($this->comments as $singleComment) 
         {     
               echo'<li>'.$singleComment->getComment().'</li>';
         }
         echo '</ul>';
      }
   public function getId()
      {
         return $this->id;
      }
   public function getPost()
      {
         return $this->post;
      }
   public function getCreated_at()
      {
         return $this->created_at;
      }
   public function getUpdated_at()
      {
         return $this->updated_at;
      }
   public function getAuther()
      {
         return $this->auther;
      }
   public function getComments()
      {
         return $this->comments;
      }
}