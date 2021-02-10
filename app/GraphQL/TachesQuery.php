namespace App\GraphQL\Queries;

use GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;
use GraphQL\Type\Definition\Type;
use App\Models\Tache;

class TachesQuery extends Query {

    protected $attributes = [
        'name'  => 'taches',
    ];

    public function authorize(array $args = [])
    {
        return true;
    }

    public function type()
    {
        return Type::listOf(GraphQL::type('Tache')); //retrieve a collection of taches
    }

    public function args()
    {
        return [
            'ids'   => [
                'name' => 'ids',
                'type' => Type::listOf(Type::int()),
            ],
        ];
    }

    public function rules(array $args = [])
    {
        return [
            'ids' => [
                'array',
            ],
            'ids.*' => [
                'numeric',
            ]
        ];
    }

    public function resolve($root, $args)
    {
        if (isset($args['ids'])) {
            return Tache::find($args['ids']);
        }

        return Tache::all();
    }
}