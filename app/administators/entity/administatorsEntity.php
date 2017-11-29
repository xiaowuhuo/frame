<?php
namespace app\administators\entity;

/**
 * @Entity @Table(name="administators")
 **/
class administatorsEntity
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;
    /** @Column(type="string") **/
    protected $name;

    public function setName($name)
    {
        $this->name = $name;
    }

    // .. (other code)
}