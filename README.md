## How to get started
- Clone repo
- Run `composer install`.
- Run `npm install`.
- Run `npm run build`.

## Add the database details in `.env` file.
- DB_CONNECTION=`mysql`
- DB_HOST=`DB_HOST`
- DB_PORT=`DB_PORT`
- DB_DATABASE=`DB_DATABASE`
- DB_USERNAME=`DB_USERNAME`
- DB_PASSWORD=`DB_PASSWORD`

## Run the migration and seeder commands
- Execute `php artisan migrate`.
- Execute `php artisan db:seed`.

## To log in as an admin, use the following credentials:
- Email: admin@mailinator.com
- Password: 12345678

## Clients in the future could also be suppliers.
## Clients in the future could also sell products/ or refer other clients on behalf of the company and earn  commission.
- I've expanded the database schema. Two new tables, namely `client_referrals` and `product_masters`, have been      created, and corresponding migrations have been implemented.

- Also established relationships between these tables using Laravel's Eloquent relationships.

- Currently added following fields in `product_masters` table and will enhance this in future as per the requirement:
 - `id`
 - `product_name`
 - `seller_id` (foreign key establishing a relationship with the client table)
 - `status`
 - `created_at`
 - `updated_at`

It's worth noting that the `seller_id` is a foreign key, forming a relationship with the client table.

- Currently added following fields in product_masters table:
  - `id`
  - `client_id`
  - `referred_to`
  - `commission`
  - `created_at`
  - `updated_at`

In this case, both `client_id` and `referred_to` serve as foreign keys, establishing relationships with the `clients` table.
