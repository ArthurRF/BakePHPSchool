<?php
namespace App\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;

class ContactForm extends Form
{
    protected function _buildSchema(Schema $schema): Schema
    {
        return $schema->addField('name', 'string')
            ->addField('email', ['type' => 'string'])
            ->addField('body', ['type' => 'text']);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator->minLength('name', 10)
            ->email('email');

        return $validator;
    }

    protected function _execute(array $data): bool
    {
        return true;
    }
}

$contact = new ContactForm();
echo $this->Form->create($contact);
echo $this->Form->control('name');
echo $this->Form->control('email');
echo $this->Form->control('observation');
echo $this->Form->button('Submit');
echo $this->Form->end();

if ($this->request->is('post')) {
    echo 'O nome informado foi: '. $this->request->getData()['name'] . ' e o email é valido. <br>';
    echo 'Sua observação foi: '. $this->request->getData()['observation'];
}