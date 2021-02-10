namespace App\GraphQL\Mutations;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Illuminate\Validation\Rule;
use App\Models\Tache;

class UpdateTacheMutation extends Mutation
{
    protected $attributes = [
        'name' => 'updateTache'
    ];

    public function authorize(array $args = [])
    {
        return true;
    }

    public function rules(array $args = [])
    {
        return [
            'id' => [
                'required', 
            ],
            'titre' => [
                'required', 
            ],
            'description' => [
                'required',
            ],
            'date' => [
                'required',
            ],
        ];
    }

    public function type()
    {
        return GraphQL::type('Tache');
    }

    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' =>  Type::nonNull(Type::int()),
            ],
            'titre' => [
                'name' => 'titre',
                'type' =>  Type::nonNull(Type::string()),
            ],
            'description' => [
                'name' => 'description',
                'type' =>  Type::nonNull(Type::longText()),
            ],
            'date' => [
                'name' => 'date',
                'type' =>  Type::nonNull(Type::date()),
            ],
        ];
    }

    public function resolve($root, $args)
    {
        $tache = Tache::findOrFail($args['id']);
        $tache->fill($args);
        $tache->save();

        return $tache;
    }
}