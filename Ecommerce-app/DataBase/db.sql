CREATE DATABASE ShopArt;
USE ShopArt;

CREATE TABLE Utilisateur (
    idUtilisateur INT AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(50) NOT NULL,
    lastName VARCHAR(50) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(100) NOT NULL,
    tele VARCHAR(15),
    cin VARCHAR(20)  NOT NULL,
    genre ENUM('Homme', 'Femme'),
    role VARCHAR(20) ,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE Categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT
);


CREATE TABLE Products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    image_url VARCHAR(255),
    category_id INT,
    admin_id INT,
    CONSTRAINT fk_category FOREIGN KEY (category_id) REFERENCES Categories(id) ON DELETE SET NULL
);



CREATE TABLE Orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    utilisateur_id INT,
    total_price DECIMAL(10, 2) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    status ENUM('Pending', 'Completed', 'Cancelled') DEFAULT 'Pending',
    CONSTRAINT fk_user_order FOREIGN KEY (utilisateur_id) REFERENCES Utilisateur(idUtilisateur) ON DELETE CASCADE
);


CREATE TABLE OrderItems (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    product_id INT,
    quantity INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    CONSTRAINT fk_order FOREIGN KEY (order_id) REFERENCES Orders(order_id) ON DELETE CASCADE,
    CONSTRAINT fk_product_order FOREIGN KEY (product_id) REFERENCES Products(id) ON DELETE CASCADE
);


CREATE TABLE Payement (
    idPayement INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    num_cart VARCHAR(16) NOT NULL,
    date_year TINYINT UNSIGNED CHECK (date_year BETWEEN 24 AND 99),
    date_month TINYINT UNSIGNED CHECK (date_month BETWEEN 1 AND 12),
    cvv_cart SMALLINT UNSIGNED CHECK (cvv_cart BETWEEN 100 AND 999),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_payment_order FOREIGN KEY (order_id) REFERENCES Orders(order_id)
);
INSERT INTO `Utilisateur` (`firstName`, `lastName`, `email`, `password`, `tele`,`role`, `created_at`)
VALUES 
('Admin1', 'Lastname1', 'admin1@example.com', 'admin', '1234567890','admin', NOW()),
('Admin2', 'Lastname2', 'admin2@example.com', 'admin', '0987654321','admin', NOW()),
('Admin3', 'Lastname3', 'admin3@example.com', 'admin', '1122334455','admin', NOW()),
('Admin4', 'Lastname4', 'admin4@example.com', 'admin', '5566778899','admin', NOW());
INSERT INTO categories (name, description) VALUES
('Abstract', 'Art that does not attempt to represent external reality, but seeks to achieve its effect using shapes, colors, and textures.'),
('Landscape', 'Depictions of natural scenery such as mountains, valleys, trees, rivers, and forests.'),
('Portrait', 'Art focusing on representing a person, capturing their likeness, personality, or mood.'),
('Still Life', 'Art depicting mostly inanimate objects, like flowers, fruits, or household items.'),
('Realism', 'Art style that attempts to represent subject matter truthfully, without artificiality.'),
('Impressionism', 'Art characterized by small, thin brush strokes and an emphasis on light and its changing qualities.'),
('Surrealism', 'Art that seeks to unleash the creative potential of the unconscious mind, often through dreamlike imagery.'),
('Expressionism', 'Art emphasizing emotional experience over physical reality, often with bold colors and exaggerated forms.'),
('Modern', 'Art that embraces innovation and experimentation in form and technique.'),
('Pop Art', 'Art based on popular culture and mass media, often using bright colors and bold graphics.');



CREATE TABLE cart (
    id INT AUTO_INCREMENT PRIMARY KEY,       
    name VARCHAR(255) NOT NULL,              
    price INT NOT NULL,           
    image VARCHAR(255) NOT NULL,           
    quantity INT NOT NULL DEFAULT 1          
);

INSERT INTO products (name, description, price, image_url, category_id, admin_id) VALUES
('Mona Lisa', 'The Mona Lisa is an iconic painting of Renaissance art created by Leonardo da Vinci. It is widely recognized for its mysterious smile and its use of sfumato, a technique that blends colors and tones. The painting, which portrays a woman with a subtle expression, is housed in the Louvre Museum in Paris and is considered one of the most famous works of art in the world.', 20000.00, 'MonaLisa.jpg', 1, NULL),
('Water Lilies', 'The Water Lilies are a series of Impressionist paintings by Claude Monet, which depict his flower garden in Giverny. These paintings are renowned for their use of color and light, as well as their depiction of water as a reflective surface. Monet’s Water Lilies have become a symbol of tranquility and natural beauty, capturing the essence of the changing seasons and the passage of time.', 1000.00, 'lesnympheas.jpg', 2, NULL),
('The Starry Night', 'The Starry Night is a famous painting by Vincent van Gogh, created in 1889. It shows a night sky swirling with stars above a quiet village, with bold, expressive brush strokes. The painting conveys a sense of both movement and calm, and is known for its vibrant blues and yellows, as well as its depiction of the artist’s emotional turmoil. It is housed in the Museum of Modern Art in New York City.', 1500.00, 'LaNuitétoilée.jpg', 3, NULL),
('The Scream', 'The Scream is an expressionist painting by Edvard Munch, created in 1893. It depicts a figure with an agonized expression standing on a bridge, surrounded by swirling skies and tumultuous water. The painting is often interpreted as a representation of human anxiety and existential dread, and is one of the most iconic images in the history of art. It is housed in the National Gallery in Oslo, Norway.', 3000.00, 'LeCri.jpg', 4, NULL),
('Guernica', 'Guernica is a mural-sized painting by Pablo Picasso, created in response to the bombing of the Basque town of Guernica during the Spanish Civil War. The painting is a stark, black-and-white depiction of the chaos and suffering caused by the air raid, using distorted figures and symbols to convey the horrors of war. It is one of Picasso’s most powerful anti-war statements, and is housed in the Museo Reina Sofia in Madrid.', 3400.00, 'Guernica.jpg', 5, NULL),
('The Night Watch', 'The Night Watch is a famous Baroque painting by Rembrandt, created in 1642. The painting depicts a group of militiamen, led by Captain Frans Banning Cocq, in a dramatic, dynamic composition. The work is notable for its use of light and shadow, and for its depiction of motion, as the figures seem to come alive. It is housed in the Rijksmuseum in Amsterdam, and is one of the most celebrated works of Dutch Golden Age painting.', 4000.00, 'TheNightWatch.jpg', 3, NULL),
('Las Meninas', 'Las Meninas is a masterpiece by Diego Velázquez, created in 1656. The painting shows the Spanish royal family, with Infanta Margaret Theresa at the center, surrounded by her attendants, as well as Velázquez himself painting the scene. The work is celebrated for its complex composition, use of perspective, and the play of light and shadow. It is housed in the Prado Museum in Madrid.', 12000.00, 'LasMeninas.jpg', 3, NULL),
('The Persistence of Memory', 'The Persistence of Memory is a surrealistic painting by Salvador Dalí, created in 1931. The painting is famous for its depiction of melting clocks draped over various objects in a desolate landscape. The image conveys a sense of distorted time and space, and is often interpreted as a meditation on the relativity of time. It is housed in the Museum of Modern Art in New York City.', 3500000.00, 'ThePersistenceofMemory.jpg', 2, NULL),
('Girl with a Balloon', 'Girl with a Balloon is a famous piece by the anonymous street artist Banksy. The image shows a young girl reaching out towards a red, heart-shaped balloon that is drifting away. The work is often seen as a symbol of innocence and loss, and is one of Banksy’s most iconic and widely reproduced works. It has been displayed in various locations and was famously shredded after being sold at auction.', 2000000.00, 'GirlwithaBalloon.jpg', 4, NULL);
