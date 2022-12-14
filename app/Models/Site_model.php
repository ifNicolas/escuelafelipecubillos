<?php

use CodeIgniter\BaseModel;
use CodeIgniter\Model;
use LDAP\Result;

Class Site_model extends Model
{
    protected $table = 'user';
    
    protected $allowedFields = [
        'RUT',
        'NOMBRE',
        'APELLIDO',
        'CORREO',
        'CONTRASEÑA',
        
    ];

    // protected $table = "";
// protected $primaryKey="";
// protected $allowedFields="";

    //CONSULTA PARA BUSCAR DATOS DE LOGIN EN BD
     function login($data)

     
    {
        
        
        //hacemos la consulta a la BD 
        // $sql="SELECT * FROM user WHERE('CORREO',$data['corrreo']); AND CONTRASEÑA=:$data('contraseña'): AND author=:name:";
        $sql = 'SELECT * FROM user WHERE CORREO = ? AND CONTRASEÑA = ? ';
        $db->query($sql, [$data['correo'], $data['contraseña']]);
       
        // $this->db->select("*");
        // $this->db->from("user");
        // $this->db->where("CORREO",$data['correo']);
        // $this->db->where("CONTRASEÑA",$data['contraseña']);

        //genera la obtencion de datos
        $query=$this->$sql->get();

        

        //hace la consulta que verifica si hay columndas disponibles 
        if($query->num_rows()>0)
        {
            //retorna el resultado de la consulta
           return $query->result();
          
        }else
        {
            return NULL;
        }
         
    }


    //CONSULTA PARA SUBIR ARCHIOS A LA BD 
    function uploadArchivo($data,$archivo)
    {
         $array=array
         (  
            "TITULO" =>$data['titulo'],
            "ARCHIVO"=>$archivo
         );
         $this->db->insert("archivos",$array);
    }

    //CONSULTA PARA LISTAR LOS ARCHIVOS 
     function downloadArchivo()
     {
        $this->db->select("*");
        $this->db->from("archivos");
        //$this->db->where("TITULO",$titulo);
        $this->db->order_by("ID","ASC");

        $query =$this->bd->get();
         print_r($this->bd->last_query());

        if($query->num_rows()>0)
        {
             return $query->result();
             print_r($query);
        }else
         {
            return NULL;
         }
     }
}
