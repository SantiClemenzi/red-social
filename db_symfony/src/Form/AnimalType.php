<?PHP

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AnimalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('tipo', TextType::class, ['label' => 'tipo'])
            ->add('color', TextType::class, ['label' => 'color'])
            ->add('raza', TextType::class, ['label' => 'raza'])
            ->add('submit', SubmitType::class);
    }
}
