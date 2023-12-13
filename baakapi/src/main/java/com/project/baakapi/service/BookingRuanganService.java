package com.project.baakapi.service;

import com.project.baakapi.model.BookingRuangan;
import com.project.baakapi.repository.BookingRuanganRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.Date;
import java.util.List;

@Service
public class BookingRuanganService {

    @Autowired
    private BookingRuanganRepository bookingRuanganRepository;

    public BookingRuangan getById(Long id) {
        return bookingRuanganRepository.findById(id).orElse(null);
    }

    public List<BookingRuangan> getAllBookings() {
        return bookingRuanganRepository.findAll();
    }

    public BookingRuangan createBooking(BookingRuangan bookingRuangan) {
        // Lakukan validasi atau logika bisnis jika diperlukan
        bookingRuangan.setCreatedAt(new Date());
        bookingRuangan.setUpdatedAt(new Date());
        return bookingRuanganRepository.save(bookingRuangan);
    }

    public BookingRuangan updateBooking(Long id, BookingRuangan updatedBooking) {
        BookingRuangan existingBooking = bookingRuanganRepository.findById(id).orElse(null);
        if (existingBooking != null) {
            // Lakukan validasi atau logika bisnis jika diperlukan
            existingBooking.setUser(updatedBooking.getUser());
            existingBooking.setRuangan(updatedBooking.getRuangan());
            existingBooking.setWaktuMulai(updatedBooking.getWaktuMulai());
            existingBooking.setWaktuSelesai(updatedBooking.getWaktuSelesai());
            existingBooking.setStatus(updatedBooking.getStatus());
            // Set atribut lain sesuai kebutuhan

            existingBooking.setUpdatedAt(new Date()); // Update waktu pembaruan
            return bookingRuanganRepository.save(existingBooking);
        } else {
            return null; // BookingRuangan dengan ID tersebut tidak ditemukan
        }
    }

    public void deleteBooking(Long id) {
        bookingRuanganRepository.deleteById(id);
    }
}

