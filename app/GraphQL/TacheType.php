namespace App\GraphQL\Types;

use GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;
use App\Models\Tache;

class TacheType extends GraphQLType {

    protected $attributes = [
        'tire'          => 'Tache', 
        'description'   => 'description', 
        'date'          => 'date',
        'model'         => Tache::class, 
    ];

    public function fields()
    {
        return [
            'id' => [
                //defining the id field as a non-null integer
                'type'          => Type::nonNull(Type::int()),
                'description'   => 'ID de la tache',
            ],
            'titre' => [
                //defining the name field as a non-null string
                'type'          => Type::nonNull(Type::string()),
                'description'   => 'titre de la tache',
            ],
            'description' => [
                //defining the description field as a non-null string
                'type'          => Type::nonNull(Type::string()),
                'description'   => 'description de la tache',
            ],
            'date' => [
                //defining the date field as a non-null string
                'type'          => Type::nonNull(Type::date()),
                'description'   => 'date de fin de la tache',
            ],
        ];
    }
}