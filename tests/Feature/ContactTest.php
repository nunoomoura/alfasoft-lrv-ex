<?php

use App\Models\Contact;

it('displays validation errors when creating a contact with invalid data', function () {
    $response = $this->asUser()->post(route('contacts.store'), []);

    $response->assertSessionHasErrors(['name', 'contact', 'email']);
});

it('displays validation errors when updating a contact with invalid data', function () {
    $contact = Contact::factory()->create();

    $response = $this->asUser()->put(route('contacts.update', $contact), [
        'name' => '',
        'contact' => 'invalid',
        'email' => 'invalid',
    ]);

    $response->assertSessionHasErrors(['name', 'contact', 'email']);
});

it('allows updating a contact with valid data', function () {
    $contact = Contact::factory()->create();

    $response = $this->asUser()->put(route('contacts.update', $contact), [
        'name' => 'Updated Name',
        'contact' => '123456789',
        'email' => 'updated@example.com',
    ]);

    $response->assertRedirect(route('contacts.show', $contact));
    $this->assertDatabaseHas('contacts', [
        'id' => $contact->id,
        'name' => 'Updated Name',
        'contact' => '123456789',
        'email' => 'updated@example.com',
    ]);
});

it('allows creating a contact with valid data', function () {
    $response = $this->asUser()->post(route('contacts.store'), [
        'name' => 'New Contact',
        'contact' => '123456789',
        'email' => 'new@example.com',
    ]);

    $response->assertRedirect(route('contacts.show', Contact::latest()->first()));
    $this->assertDatabaseHas('contacts', [
        'name' => 'New Contact',
        'contact' => '123456789',
        'email' => 'new@example.com',
    ]);
});

