Use Laravel Boost before answering.

Inspect the Laravel version, installed packages, existing routes, models, database schema, and project structure related to invoices.

Then search the relevant Laravel documentation before proposing the implementation.

This project follows Domain Driven Design and CQRS.

I need to add an endpoint that returns a paginated list of invoices for the authenticated user.

Before generating code, identify:
the bounded context this feature belongs to,
whether this is a command, a query, or both,
the query object or query handler that should be created,
the controller or HTTP action that should call it,
the authorization policy involved,
the API Resource used for the response,
the Pest tests that should be added or updated.

Do not place query logic directly in the controller.
Do not use Eloquent models as response structures.
Do not introduce new packages.
Follow the existing namespace and directory conventions.
