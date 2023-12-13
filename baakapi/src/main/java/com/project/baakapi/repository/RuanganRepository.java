package com.project.baakapi.repository;

import com.project.baakapi.model.Ruangan;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface RuanganRepository extends JpaRepository<Ruangan, Long> {
    // Repository ini akan secara otomatis menyediakan metode CRUD standar
    // Jika Anda memerlukan metode tambahan, Anda dapat menambahkannya di sini
}
