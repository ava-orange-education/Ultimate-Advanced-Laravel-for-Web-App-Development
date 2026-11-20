---
name: invoice-workflows
description: Build and modify invoice workflows in the billing domain.
---

# Invoice Workflows

Use this skill when creating or modifying invoice generation, invoice updates, payment allocation, or invoice related tests.

## Conventions

Invoice write operations must be wrapped in a database transaction.

Controllers must not contain billing logic.

Use app/Services/Billing for billing application services.

Dispatch domain events only after successful persistence.

Use Pest feature tests for HTTP behavior.

Use Pest unit tests for calculation rules.

## Required Review Points

Check authorization through InvoicePolicy.

Check validation through a Form Request.

Check that money values are stored in minor units.

Check that invoice line items are persisted consistently.

Check that generated responses use InvoiceResource.
