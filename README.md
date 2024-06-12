# PG System

This project is a PG (Paying Guest) Management System developed in PHP and MySQL. The system allows users to manage listings, view detailed information about PGs, filter PGs based on various criteria, and more.

## Features

- **Add/Edit Listings**: Users can add new PG listings or edit existing ones.
- **View Listings**: Users can view listings added by other users.
- **Filter PGs**: Users can filter PGs based on:
  - Rules of PG
  - Locality
  - Address
  - Meal Type Served
  - Budget
- **Top Listings**: Top PG listings are displayed on the landing page.
- **High Rated PGs**: High rated PGs are showcased on the landing page.
- **Detailed PG Page**: Each PG listing has a detailed page containing:
  - Description
  - Images
  - Videos
  - Facilities
  - Rules
  - Ratings
  - Comments
- **Comments and Ratings**: Users can comment on PG listings and give ratings. Average ratings are displayed to all users.
- **Nearby PGs**: Detailed PG pages also show nearby PGs.

## Installation

### Prerequisites

- **Web Server**: Apache or Nginx
- **PHP**: Version 7.4 or higher
- **MySQL**: Version 5.7 or higher
- **Composer**: Dependency Manager for PHP

### Steps

1. **Clone the Repository**
   ```bash
   git clone https://github.com/your-username/pg-system.git
   cd pg
   ```

2. **Install Dependencies**
   ```bash
   composer install
   ```

3. **Database Setup**
   - Create a MySQL database.
   - Import the database file provided in the `database` folder:
     ```bash
     mysql -u your-username -p your-database-name < database/pg_system.sql
     ```

5. **Run the Application**
   - Start your web server and navigate to the project's root directory in your browser.

## Usage

- **Add/Edit Listings**: Go to the 'Add Listing' page to add a new PG listing or edit an existing one from the 'Edit Listing' page.
- **View Listings**: Navigate to the 'View Listings' page to see all the PGs listed by users.
- **Filter PGs**: Use the filter options available on the listings page to find PGs based on specific criteria.
- **Top and High Rated Listings**: Check the landing page for top and high rated PG listings.
- **Detailed PG Page**: Click on any listing to view detailed information, images, videos, and facilities of the PG.
- **Comments and Ratings**: On the detailed PG page, users can leave comments and ratings for the PG.

## Contributing

Contributions are welcome! Please submit a pull request or open an issue to discuss your ideas.

## Contact

For any inquiries or issues, please contact [zahoor.shah.codes@gmail.com](mailto:zahoor.shah.codes@gmail.com).

---

Enjoy using the PG System!
