package com.project.baakapi.repository;

import com.project.baakapi.model.Product;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface ProductRepository extends JpaRepository<Product, Long> {
    // Repository ini akan secara otomatis menyediakan metode CRUD standar
    // Jika Anda memerlukan metode tambahan, Anda dapat menambahkannya di sini
}
