namespace App\GraphQL\Queries;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;
use App\Models\Tache;

class TacheQuery extends Query {

    protected $attributes = [
        'name'  => 'tache',
    ];

    public function authorize(array $args = [])
    {
        return true;
    }

    public function type()
    {
        return GraphQL::type('Tache'); //retrieve a single tache
    }

    public function rules(array $args = [])
    {
        return [
            'id' => [
                'required',
                'numeric',
                'min:1',
                'exists:taches,id'
            ],
        ];
    }

    public function args()
    {
        return [
            'id'    => [
                'name' => 'id',
                'type' => Type::int(),
            ],
        ];
    }

    public function resolve($root, $args, SelectFields $fields)
    {
        return Tache::findOrFail($args['id']);
    }

}