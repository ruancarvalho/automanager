/* SQL */

ALTER TABLE orders ADD customer_id INT NOT NULL AFTER customer;

ALTER TABLE orders ADD vehicle_id INT NOT NULL AFTER vehicle;

UPDATE orders SET orders.customer_id = 1 WHERE orders.customer LIKE "";

UPDATE orders SET orders.vehicle_id = 1 WHERE orders.plate LIKE "";

INSERT INTO customers (name)
SELECT DISTINCT customer FROM orders
WHERE customer <> '';

INSERT INTO vehicles (vin, model)
SELECT DISTINCT plate, vehicle FROM orders
WHERE plate <> '';


UPDATE orders
  INNER JOIN customers
    ON orders.customer LIKE customers.name
SET
  orders.customer_id = customers.id

UPDATE orders
  INNER JOIN vehicles
    ON orders.vehicle LIKE vehicles.model
SET
  orders.vehicle_id = vehicles.id