<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name=$this->faker->lastName();
        $prename=$this->faker->unique()->firstName();
        $folder ='avatars';
        $path=storage_path().'\\app\\public\\images\\'.$folder;
        $i = $this->faker->numberBetween($min = 0, $max = 6);
        if ($i==0) {
            $email="$name$prename";
        } elseif ($i==1) {
            $email="$prename.$name";
        } elseif ($i==2) {
            $email="$name.$prename";
        } elseif ($i==3) {
            $email="$prename$name";
        } elseif ($i==4) {
            $email=$name.'_'.$prename;
        } elseif ($i==5) {
            $email=$prename.'_'.$name;
        } else {
            $email=$this->faker->userName();
        }
        $email = $this->limpiar_correo($email);

        return [
            'name' => $name,
            'prename' => $prename,
            'email' => $email.'@'.$this->faker->freeEmailDomain(),
            'email_verified_at' => now(),
            'avatar'=>$this->faker->image(
                $dir =$path,
                $width = 640,
                $height = 480,
                $img='',
                $onlyNameFile=false, //it's a filename without path
                $rndImg=false, // it's a no randomize images (default: `true`)
                $text = $this->getIniciales($prename.' '.$name)
            ),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    public function getIniciales($nombre)
    {
        $name = '';
        $explode = explode(' ', $nombre);
        foreach ($explode as $x) {
            $name .=  $x[0];
        }
        return $name;
    }

    public function limpiar_correo($string) //función para limpiar strings
    {
        $string = trim($string);

        $string = str_replace(
            array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
            array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
            $string
        );

        $string = str_replace(
            array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
            array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
            $string
        );

        $string = str_replace(
            array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
            array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
            $string
        );

        $string = str_replace(
            array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
            array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
            $string
        );

        $string = str_replace(
            array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
            array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
            $string
        );

        $string = str_replace(
            array('ñ', 'Ñ', 'ç', 'Ç'),
            array('n', 'N', 'c', 'C',),
            $string
        );

        //Esta parte se encarga de eliminar cualquier caracter extraño
        $string = str_replace(
            array("|", "!", "",
           "·", "$", "%", "&", "/",
           "(", ")", "?", "'", "¡",
           "¿", "[", "^", "<code>", "]",
           "+", "}", "{", "¨", "´",
           ">", "< ", ";", ",", ":", " "),
            '',
            $string
        );

        return $string;
    }
}
