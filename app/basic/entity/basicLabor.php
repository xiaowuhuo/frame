<?php
// src/Product.php
/**
 * @Entity @Table(name="basicLabor")
 **/
class basicLabor
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;
    /** @Column(type="string") **/
    protected $name;

    // .. (other code)
}