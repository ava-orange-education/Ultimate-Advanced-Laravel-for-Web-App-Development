# Project Architecture Guidelines

This project is an enterprise Laravel 13 application.

Use Pest for all new tests.

Use Form Requests for HTTP validation.

Use policies for authorization.

Keep controllers thin. Business logic must live in application services.

Use API Resources for JSON responses.

Do not introduce new packages without explicit approval.

Follow the existing namespace and directory structure.
