<?php
namespace App\Command;

use App\Entity\PerfilDefinido;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CargarPerfilesPredefinidosCommand extends Command
{
    // Agrega el EntityManager
    private $entityManager;

    // Inyecta el EntityManager en el constructor
    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct();

        $this->entityManager = $entityManager;
    }

    protected function configure(): void
    {
        $this
            ->setName('app:cargar-perfiles-predefinidos')
            ->setDescription('Cargar perfiles predefinidos en la base de datos');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // Lógica para cargar perfiles predefinidos
        $perfiles = [
            ['nombre' => 'Contravidrio', 'codigo' => '1010981', 'linea' => 'TradicionalPlus'],
            ['nombre' => 'Parante', 'codigo' => '1010988', 'linea' => 'TradicionalPlus'],
            ['nombre' => 'Batiente', 'codigo' => '1010992', 'linea' => 'TradicionalPlus'],
            ['nombre' => 'Travesaño Ancho', 'codigo' => '1010991', 'linea' => 'TradicionalPlus'],
            ['nombre' => 'Tapajunta', 'codigo' => '1010948', 'linea' => 'TradicionalPlus'],
        ];
        
        foreach ($perfiles as $perfilData) {
            $perfil = new PerfilDefinido();
            $perfil->setNombre($perfilData['nombre']);
            $perfil->setCodigo($perfilData['codigo']);
            $perfil->setLinea($perfilData['linea']);
        
            // Establece la ruta de la imagen para cada perfil
            $imagenPerfil = $perfilData['nombre'] . '.png';
            $rutaImagen = 'images/' . $imagenPerfil;
            
            $perfil->setImagen($rutaImagen);
        
            // Persiste el perfil en la base de datos
            $this->entityManager->persist($perfil);
        }

        // Aplica los cambios en la base de datos
        $this->entityManager->flush();

        $output->writeln('Perfiles predefinidos cargados exitosamente.');

        return Command::SUCCESS;
    }   
}

?>
