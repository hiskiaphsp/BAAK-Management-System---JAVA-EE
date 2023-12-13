package com.project.baakapi.controller;

import com.project.baakapi.model.BookingRuangan;
import com.project.baakapi.service.BookingRuanganService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@RestController
@RequestMapping("/api/booking-ruangan")
public class BookingRuanganController {

    @Autowired
    private BookingRuanganService bookingRuanganService;

    @GetMapping("/{id}")
    public ResponseEntity<BookingRuangan> getBookingById(@PathVariable Long id) {
        BookingRuangan booking = bookingRuanganService.getById(id);
        if (booking != null) {
            return new ResponseEntity<>(booking, HttpStatus.OK);
        } else {
            return new ResponseEntity<>(HttpStatus.NOT_FOUND);
        }
    }

    @GetMapping
    public ResponseEntity<List<BookingRuangan>> getAllBookings() {
        List<BookingRuangan> bookings = bookingRuanganService.getAllBookings();
        return new ResponseEntity<>(bookings, HttpStatus.OK);
    }

    @PostMapping
    public ResponseEntity<BookingRuangan> createBooking(@RequestBody BookingRuangan bookingRuangan) {
        BookingRuangan createdBooking = bookingRuanganService.createBooking(bookingRuangan);
        return new ResponseEntity<>(createdBooking, HttpStatus.CREATED);
    }

    @PutMapping("/{id}")
    public ResponseEntity<BookingRuangan> updateBooking(@PathVariable Long id, @RequestBody BookingRuangan updatedBooking) {
        BookingRuangan booking = bookingRuanganService.updateBooking(id, updatedBooking);
        if (booking != null) {
            return new ResponseEntity<>(booking, HttpStatus.OK);
        } else {
            return new ResponseEntity<>(HttpStatus.NOT_FOUND);
        }
    }

    @DeleteMapping("/{id}")
    public ResponseEntity<Void> deleteBooking(@PathVariable Long id) {
        bookingRuanganService.deleteBooking(id);
        return new ResponseEntity<>(HttpStatus.NO_CONTENT);
    }
}
