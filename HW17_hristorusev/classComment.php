<?php
class ClassComment
{
   protected $id;
   protected $post_id;
   protected $comment;
   protected $created_at;
   protected $updated_at;
   function __construct($data)
      {
          $this->id = (isset($data['id'])) ? $data['id'] : NULL;
          $this->post_id = (isset($data['post_id'])) ? $data['post_id'] : NULL;
          $this->comment = (isset($data['comment'])) ? $data['comment'] : NULL;
          $this->created_at = (isset($data['created_at'])) ? $data['created_at'] : NULL;
          $this->updated_at = (isset($data['updated_at'])) ? $data['updated_at'] : NULL;
      }
   public function saveCommentInDB()
      {
         if(isset($this->id))
            {
               echo "This comment exist!<br/>";
            }
         else
            {
               $newDatabaseConnection = new ClassDatabase();
               $id = $newDatabaseConnection->isnertInDB('comments',get_object_vars($this));
               $this->id = ($id!=-1) ? $id : NULL;
               $newDatabaseConnection->closeDBconection();
               //echo "Successfully insert comment with $id id!<br/>";
            }

      }
    public function getCommentInfoFromDB()
      { 
         $newDatabaseConnection = new ClassDatabase();
         $returnInfo = $newDatabaseConnection->selectFromDB('comments',get_object_vars($this));
         //var_dump($returnInfo);
         if(count($returnInfo)==1)
               {
                  foreach ($returnInfo as $singleCommentInfo) 
                     {
                           foreach ($singleCommentInfo as $key => $value) 
                           {
                              $this->$key = $value;
                           }
                     }
               }
         $newDatabaseConnection->closeDBconection();
      }
   public function getId()
      {
         return $this->id;
      }
   public function getPost_id()
      {
         return $this->post_id;
      }
   public function getComment()
      {
         return $this->comment;
      }
   public function getCreated_at()
      {
         return $this->created_at;
      }
   public function getUpdated_at()
      {
         return $this->updated_at;
      }
}