InvoiceController / ListInvoicesController
    ↓ Handles the request for retrieving invoices

ListInvoicesQuery / ListInvoicesHandler
    ↓ Executes the read operation

Invoice Read Model / Eloquent Projection
    ↓ Fetches invoice data from the database

Paginated Invoice DTOs / Resource Data
    ↓ Prepares paginated response data

InvoiceResource
    ↓ Formats the final API response
