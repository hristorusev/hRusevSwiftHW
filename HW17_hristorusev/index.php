<?php
include 'classDatabase.php';
include 'classUser.php';
include 'classComment.php';
include 'classPost.php';
$usersDataArray = array(array('username'=>'test1',
                         'password'=>'testpassword1',
                         'email'=>'test@gmail.com1',
                         'first_name'=>'testFirstName1',
                         'last_name'=>'testlastName1'),
                   array('username'=>'tes21',
                         'password'=>'testpassword2',
                         'email'=>'test@gmail.com2',
                         'first_name'=>'testFirstName2',
                         'last_name'=>'testlastName2'),
                   array('username'=>'test3',
                         'password'=>'testpassword3',
                         'email'=>'test@gmail.com3',
                         'first_name'=>'testFirstName3',
                         'last_name'=>'testlastName3'));

foreach ($usersDataArray as $singleUserData) 
         {
           $singleUser = new ClassUser($singleUserData);
           //check user exist in DB;
           $singleUser->getUserInfoFromDB();
           //if user not exist it will be created
           if($singleUser->getId()==NULL)
            {
               $singleUser->saveUserInDB();
            }
         $usersArray[] = $singleUser;
         }
for ($i=0;$i<7;$i++) 
{ 
   $postData = array('post'=>"post text $i post text $i post text $i post text $i post text $i
                              post text $i post text $i post text $i post text $i post text $i
                              post text $i post text $i post text $i post text $i post text $i
                              post text $i post text $i post text $i post text $i post text $i
                              post text $i post text $i post text $i post text $i post text $i
                              post text $i post text $i post text $i post text $i post text $i
                              post text $i post text $i post text $i post text $i post text $i
                              post text $i post text $i post text $i post text $i post text $i",
                     'created_at'=>'CURRENT_TIMESTAMP',
                     'updated_at'=>'',
                     'auther' => $usersArray[array_rand($usersArray, 1)]);
   $singlePost = new ClassPost($postData);
   $singlePost->savePostInDB();
   $postsArray[] = $singlePost; 
}
foreach ($postsArray as $singlePost) 
{
    $numberOfComments = rand(1,4);
    for ($i=0; $i<$numberOfComments; $i++) 
      { 
         $commentData = array( 'comment'=>"coment $i coment $i coment $i coment $i coment $i",
                               'created_at'=>'CURRENT_TIMESTAMP',
                               'updated_at'=>'');
         $singlePost->addPostComment($commentData);
      }
     /*use for simulation*/
     $postDisplayArray[]=$singlePost->getId();
}
foreach ($postDisplayArray as $singlepostIndex) 
{
      $singlePost = new ClassPost(array('id'=>$singlepostIndex));
      $singlePost->getPostInfoFromDB();
      $singlePost->searchCommentsForPost();
      $singlePost->displayPostInfo();
}
?>