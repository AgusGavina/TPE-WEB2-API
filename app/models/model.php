<?php
require_once "database/config.php";
class Model
{
protected $db;

  function __construct()
  {
    $this->db = new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB . ';charset=utf8', MYSQL_USER, MYSQL_PASS);
    $this->deploy();
  }

  function deploy()
  {
    $query = $this->db->query('SHOW TABLES');
    $tables = $query->fetchAll();
    if (count($tables) == 0) {
      $sql = <<<END
      CREATE TABLE `categorys` (
      `Category_id` int(11) NOT NULL,
      `Category_name` varchar(45) NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

      --
      -- Dumping data for table `categorys`
      --

      INSERT INTO `categorys` (`Category_id`, `Category_name`) VALUES
      (1, 'Whisky'),
      (2, 'Cerveza'),
      (3, 'Gaseosa'),
      (4, 'Gin'),
      (5, 'Vodka'),
      (6, 'Fernet');

      -- --------------------------------------------------------

      --
      -- Table structure for table `products`
      --

      CREATE TABLE `products` (
      `Product_id` int(11) NOT NULL,
      `Product_name` varchar(45) NOT NULL,
      `Milliliters` int(11) NOT NULL,
      `Price` int(11) NOT NULL,
      `Category_id` int(11) NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

      --
      -- Dumping data for table `products`
      --

      INSERT INTO `products` (`Product_id`, `Product_name`, `Milliliters`, `Price`, `Category_id`) VALUES
      (1, 'Beefeater', 1000, 12400, 4),
      (2, 'Bombay Frutos', 750, 16500, 4),
      (3, 'Bombay', 750, 16500, 4),
      (4, 'BullDog', 700, 13900, 4),
      (5, 'Burnetts', 1000, 2295, 4),
      (6, 'Gordons', 700, 3600, 4),
      (7, 'Merle', 750, 3485, 4),
      (8, 'Gin Gingko', 500, 13500, 4),
      (10, 'Coca Cola', 2250, 1350, 3),
      (11, 'Sprite', 1500, 900, 3),
      (12, 'Sprite', 2250, 1350, 3),
      (13, 'Schweppes', 1500, 900, 3),
      (14, 'Absolut', 750, 8000, 5),
      (15, 'Absolut Saborizado', 750, 8000, 5),
      (16, 'Smirnoff', 700, 3000, 5),
      (17, 'Smirnoff Green Apple', 700, 3000, 5),
      (18, 'Smirnoff Watermelon', 700, 3000, 5),
      (19, 'Sky', 750, 2550, 5),
      (20, 'Black Label', 750, 18000, 1),
      (21, 'Red Label', 750, 12000, 1),
      (22, 'Jack Daniels', 750, 25550, 1),
      (23, 'Jack Honey', 750, 23500, 1),
      (24, 'J&B', 750, 5985, 1),
      (25, 'Jameson', 700, 8700, 1),
      (26, 'Buchannans', 750, 17000, 1),
      (27, 'Vat 69', 700, 2925, 1),
      (28, 'White Horse', 750, 3555, 1),
      (29, 'Budweiser', 410, 732, 2),
      (30, 'Quilmes', 473, 604, 2),
      (31, 'Corona', 710, 1100, 2),
      (32, 'Corona', 330, 588, 2),
      (33, 'Andes Rubia', 473, 588, 2),
      (34, 'Andes Roja', 473, 588, 2),
      (35, 'Andes IPA', 473, 588, 2),
      (36, 'Branca', 1000, 5000, 6),
      (37, 'Branca', 750, 4200, 6),
      (38, 'Branca Ed. Limitada', 750, 4200, 6),
      (48, '1882', 750, 2232, 6);

      -- --------------------------------------------------------

      --
      -- Table structure for table `users`
      --

      CREATE TABLE `users` (
      `id_user` int(11) NOT NULL,
      `email_user` varchar(50) NOT NULL,
      `password` varchar(255) NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

      --
      -- Dumping data for table `users`
      --

      INSERT INTO `users` (`id_user`, `email_user`, `password`) VALUES
      (6, 'webadmin', '$2y$10\$Ev5YSo/mP7/8.vAW4A/n7eN0qOovkvGtnyoIzzjo30pxWHNLj2tb.');

      --
      -- Indexes for dumped tables
      --

      --
      -- Indexes for table `categorys`
      --
      ALTER TABLE `categorys`
      ADD PRIMARY KEY (`Category_id`);

      --
      -- Indexes for table `products`
      --
      ALTER TABLE `products`
      ADD PRIMARY KEY (`Product_id`),
      ADD KEY `FK_category_id` (`Category_id`);

      --
      -- Indexes for table `users`
      --
      ALTER TABLE `users`
      ADD PRIMARY KEY (`id_user`);

      --
      -- AUTO_INCREMENT for dumped tables
      --

      --
      -- AUTO_INCREMENT for table `categorys`
      --
      ALTER TABLE `categorys`
      MODIFY `Category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

      --
      -- AUTO_INCREMENT for table `products`
      --
      ALTER TABLE `products`
      MODIFY `Product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

      --
      -- AUTO_INCREMENT for table `users`
      --
      ALTER TABLE `users`
      MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

      --
      -- Constraints for dumped tables
      --

      --
      -- Constraints for table `products`
      --
      ALTER TABLE `products`
      ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`Category_id`) REFERENCES `categorys` (`Category_id`);
      COMMIT;
      END;
      $this->db->query($sql);
    }
  }
}
