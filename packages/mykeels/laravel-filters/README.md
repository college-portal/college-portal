# Laravel Filters

Imagine that this URL:

```text
/users?name=myk&age=21&company=rick-and-morty&sort_age=desc
```

automatically knew to filter the DB query by responding with users that have their

- name containing `myk`
- age as `21`
- company name containing `rick-and-morty`

and order the records by age in descending order, all without you having to write boilerplate code 😱.

Or that you could automatically include a relationship for a model by adding a `?with_relationship` to the URL 😍, like:

![laravel-filters](https://user-images.githubusercontent.com/11996508/43687436-08f61c1c-98cd-11e8-962b-cd32c2d3bfb3.gif)

Hold your horses 😜, I'm about to show you how.

## Setup

- Add repositories to your composer.json file:

```json
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/mykeels/laravel-filters"
    }
]
```

- Add `mykeels/laravel-filters` to your the `require` section of your composer.json file:

```json
"require": {
    "mykeels/filters": "dev-master"
}
```

- Run `composer update` in your terminal to pull the package in.

## Usage

- In the Model class, you wish to make filterable, use the `FilterableTrait` like:

```php
<?php

use Mykeels\Filters\Traits\FilterableTrait;

class User {
  use FilterableTrait;
  ...
}
```

- Create a filter class for that model e.g. `UserFilter`

```php
<?php
namespace App\Filters;

use App\User;
use Mykeels\Filters\BaseFilters;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UserFilters extends BaseFilters
{
    public function name($term) {
        return $this->builder->where('users.name', 'LIKE', "%$term%");
    }
  
    public function company($term) {
        return $this->builder->whereHas('company', function ($query) use ($term) {
            return $query->where('name', 'LIKE', "%$term%");
        });
    }
  
    public function age($term) {
        $year = Carbon::now()->subYear($age)->format('Y');
        return $this->builder->where('dob', '>=', "$year-01-01")->where('dob', '<=', "$year-12-31");
    }

    public function sort_age($type = null) {
        return $this->builder->orderBy('dob', (!$type || $type == 'asc') ? 'desc' : 'asc');
    }
}
```

> Note how the name of each method maps to the key of each query string in `/users?name=myk&age=21&company=rick-and-morty&sort_age=desc`, and the parameters of the methods map to the values.

- Inject `UserFilters` in your controller 😍, like:

```php
<?php

namespace App\Http\Controllers;

use App\User;
use App\Filters\UserFilters;

class UserController extends Controller {
  
  public function index(Request $request, UserFilters $filters)
  {
      return User::filter($filters)->get();
  }
}
```

That's all! 💃

Now, you can execute your app, and use variations of the query strings that your filters allow for. 🔥🔥🔥
