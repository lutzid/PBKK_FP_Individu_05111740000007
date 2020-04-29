<?php

namespace MyModule\Dashboard\Presentation\Web\Validator;

use Phalcon\Validation;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Numericality;

class BaseValidator extends Validation
{
    public function initialize()
    {
        $this->add(
            'nama',
            new PresenceOf(
                [
                    'message' => 'Kolom nama perlu diisi',
                ]
            )
        );

        $this->add(
            'alamat',
            new PresenceOf(
                [
                    'message' => 'Kolom alamat perlu diisi',
                ]
            )
        );

        $this->add(
            'ktp',
            new PresenceOf(
                [
                    'message' => 'Kolom KTP perlu diisi',
                ]
            )
        );

        $this->add(
            'ktp',
            new Numericality(
                [
                    'message' => 'Kolom KTP harus diisi angka',
                ]
            )
        );

        $this->add(
            'Jenis_kelamin',
            new PresenceOf(
                [
                    'message' => 'Pilih jenis kelamin',
                ]
            )
        );

        $this->add(
            'tarif',
            new PresenceOf(
                [
                    'message' => 'Kolom nominal dalam uang perlu diisi',
                ]
            )
        );

        $this->add(
            'tarif',
            new Numericality(
                [
                    'message' => 'Kolom nominal dalam uang perlu diisi menggunakan angka',
                ]
            )
        );

        $this->add(
            'email',
            new PresenceOf(
                [
                    'message' => 'Kolom email perlu diisi',
                ]
            )
        );

        $this->add(
            'email',
            new Email(
                [
                    'message' => 'Kolom email harus diisi dengan email',
                ]
            )
        );

        $this->add(
            'status',
            new PresenceOf(
                [
                    'message' => 'Pilih jenis kelamin',
                ]
            )
        );
    }
}