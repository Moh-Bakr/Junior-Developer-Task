### A web-app containing two pages for:

### 1. Product list page

This is the first page of the website, containing a list of products each product has a checkbox to delete it.

```
   https://scand1web.herokuapp.com/
````
### 2. Adding a product page

This is page display a form with the following fields:

```
   https://scand1web.herokuapp.com/add-product
````

#### Each filed has a validation rule

- SKU (Must be unique, doesn't allow any special char)
- Name (doesn't allow any special char)
- Price (Must ba a number)
- Product type switcher has the following options:
- Each type contains a number of fields
    - DVD
        - Size (Must ba a number)
    - Book
        - Height (Must ba a number)
        - Width  (Must ba a number)
        - Length (Must ba a number)
    - Furniture
        - Weight (Must ba a number)
