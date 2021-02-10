namespace App\GraphQL\Mutations;

use GraphQL;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use App\models\Tache;


class DeleteTacheMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteTache',
        'description' => 'Delete a tache'
    ];
    
    public function authorize(array $args)
    {
        return true;
    }
    
    public function type()
    {
        return Type::boolean();
    }

    public function rules(array $args = [])
    {
        return [
            'id' => [
                'required', 'numeric', 'min:1', 'exists:taches,id'
            ],
        ];
    }

    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int()
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $tache = Tache::findOrFail($args['id']);

        return  $tache->delete() ? true : false;
    }
}