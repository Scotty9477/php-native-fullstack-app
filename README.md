# Mini PHP Project

Welcome to this PHP project, a "sandbox" to explore fun concepts in native PHP without using heavy frameworks. This project includes several features, such as a simple form builder and an environment variable loader.

## Features

### 1. Form Builder

The **`FormBuilder`** allows you to dynamically create HTML forms without repeating code. You can add input fields, text areas, and buttons, and generate the complete form.

### 2. Environment Variable Loader (**`.env`**)

The **`.env`** loader allows you to store sensitive information (such as database credentials) in a separate file. These values are then loaded into environment variables and are accessible throughout the project.

## Installation

1. Clone the repository:

   ```sh
   git clone <REPO_URL>
   ```

2. Navigate to the project directory:

   ```sh
   cd project_name
   ```

3. Create a **`.env`** file in the root of the project using the example below:

   ```
   # Example .env file
   DB_HOST=localhost
   DB_USER=root
   DB_PASS=secret
   ```

## Usage

- **Form Builder**\: Use **`FormBuilder`** to create dynamic forms without writing a lot of HTML manually.
- **Environment Variables**\: Store your sensitive information in the **`.env`** file and load it with **`EnvLoader`**.

## Example Code

Here is an example of using the **`.env`** loader:

```php
try {
    EnvLoader::load(__DIR__ . '/.env');
    $dbHost = getenv('DB_HOST');
    $dbUser = getenv('DB_USER');
    echo "Connecting to database at $dbHost with user $dbUser";
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
```

## Contribution

Contributions are welcome! Feel free to suggest improvements or additional features.

## License

This project is licensed under the MIT License. You are free to use, modify, and distribute it.

---

Have fun exploring native PHP! 😄





