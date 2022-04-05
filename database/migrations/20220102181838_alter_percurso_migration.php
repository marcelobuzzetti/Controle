<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class AlterPercursoMigration extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('percursos');
        $table->addColumn('status', 'integer', ['null' => true])
              ->addColumn('id_usuario_retorno', 'integer', ['null' => true])  
              ->addColumn('motivo_apagado', 'string', ['null' => true])
              ->update();
    }
}
