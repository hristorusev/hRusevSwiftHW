<?php
class ClassMessage extends ClassMainAppObject
{
	protected $id;
	protected $message;
	protected $sender;
	protected $receiver;
	protected $date_of_criation;

	public function __construct($data)
		  {
		  	$this->id = (isset($data['id'])) ? $data['id'] : NULL;
		  	$this->message = (isset($data['message'])) ? $data['message'] : NULL;
		  	$this->date_of_criation = (isset($data['date_of_creation'])) ? $data['date_of_creation'] : NULL;
		  	$this->sender = (isset($data['id_user_from'])) ? $data['id_user_from'] : NULL;
		  	$this->receiver = (isset($data['id_user'])) ? $data['id_user'] : NULL;
		  	if($this->sender != NULL)
		  		{
		  			$data = array('id' => $this->sender);
					$this->sender = new ClassUser($data);
					$this->sender->getUserDataFormDB();
		  		}
		  	if($this->receiver != NULL)
		  		{
		  			$data = array('id' => $this->receiver);
					$this->receiver = new ClassUser($data);
					$this->receiver->getUserDataFormDB();
		  		}
		  }
	public function saveMessageInDB()
      {
         if(isset($this->id))
            {
               echo "This message exists!<br/>";
            }
         else
            {
               $id_user_from = $this->sender->getId();
               $id_user = $this->receiver->getId();
               $data = array('id' => $this->id,
               				 'message' => $this->message,
               				 'date_of_creation' => $this->date_of_criation,
               				 'id_user_from' =>  $id_user_from,
               				 'id_user' => $id_user);		
               $this->saveInDB('messages',$data);
            }
      }
    public function getMessageDataFormDB()
      {
      	 $id_user_from = $this->sender->getId();
         $id_user = $this->receiver->getId();
		 $data = array('id' => $this->id,
               				 'message' => $this->message,
               				 'date_of_criation' => $this->date_of_criation,
               				 'id_user_from' =>  $id_user_from,
               				 'id_user' => $id_user);		
         $this->getDataFormDB('messages',$data);      	
      }
    public function getId()
      {
         return $this->id;
      }
    public function getMessage()
      {
         return $this->message;
      }
    public function getReceiver()
      {
         return $this->receiver;
      }
    public function getSender()
      {
         return $this->sender;
      }
    public function getDate()
      {
         return $this->date_of_criation;
      }
} 
?>