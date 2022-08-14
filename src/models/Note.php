<?php
    namespace Proy\Notas\models;

    use PDO;
    use Proy\Notas\lib\DataBase;

    class Note extends DataBase 
    { // estoy heredando, siempre utilizando composer

        private string $uuid;

        public function __construct(private string $title, private string $content)
        {
            parent::__construct();
            $this->uuid = uniqid(); // crea un valor random
        }

        public function save(){
            $query = $this->connect()->prepare("INSERT INTO notes(uuid, title, content, updated) VALUES(:uuid, :title, :content, now())"); //con now() capturo la fecha de la query en mysql
            $query->execute(['title'=>$this->title, 'uuid'=> $this->uuid, 'content'=>$this->content]);

            //minuto 19:45
        }

        public function update(){
            $query = $this->connect()->prepare("UPDATE notes SET title=:title, content =:content, updated= NOW() WHERE uuid=:uuid");
            $query->execute(['title'=>$this->title, "uuid"=> $this->uuid, "content" =>$this->content]);
        }

        public static function get($uuid){ // Estose utiliza cuando no necesariamente necesite crear un obj desde 0
            //Cuanto es static no tengo un encapsulamiento por lo que no puedo utilizar $this
            $db = new DataBase(); // el contructor es lo mismo que crear un nuevo DataBase
            $query =$db->connect()->prepare("SELECT * FROM notes WHERE uuid = :uuid");
            $query->execute(['uuid'=>$uuid]);

            //$note = new Note();//inicializo un nuevo obj
            $note = Note::createFromArray($query->fetch(PDO::FETCH_ASSOC)); // utilizo fetch porque solo quiero el primer elemnto

            return $note;
        }

        public static function getAll(){
            $notes=[];
            $db = new DataBase(); // el contructor es lo mismo que crear un nuevo DataBase
            $query =$db->connect()->query("SELECT * FROM notes");
            
            while ($r = $query->fetch(PDO::FETCH_ASSOC)) {
                $note = Note::createFromArray($r);
                array_push($notes, $note); //insertamos nota en el arreglo notas 
                
            }

           

            return $notes;

        }

        public static function createFromArray($arr):Note{
            $note = new Note($arr['title'], $arr['content']);
            $note->setUUID($arr['uuid']); //Esto lo hago para actualizar uuid que se genera random al principio

            return $note;

        }

        public function setTitle($value)
        {
            $this->title = $value;
        }
    
        public function getTitle(): string
        {
            return $this->title;
        }
    
        public function getUpdatedAt(): string
        {
            return $this->updatedAt;
        }
    
        public function setUpdatedAt()
        {
            $this->updatedAt = date(DATE_RSS);
        }
    
        public function getContent(): string
        {
            return $this->content;
        }
        public function setContent($value)
        {
            $this->content = $value;
        }
    
        public function getUUID(): string
        {
            return $this->uuid;
        }
    
        public function setUUID($value)
        {
            $this->uuid = $value;
        }



    }
    