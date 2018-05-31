var should = require('chai').should(),
    expect = require('chai').expect,
    supertest = require('supertest'),
    api = supertest('http://league-manager.test/api'), // localhost:8000
    faker = require('faker');

describe('Participant Endpoints', () => {
    it("has 50 participants after seeding the database", (done) => {
        api.get('/participants')
            .set('Accept', 'application/json')
            .expect(200)
            .end((err, res) => {
                expect(res.body.length).to.be.at.least(50);
                done();
            });
    });

    it('has the correct structure for a single participant', (done) => {
        api.get('/participants/1')
            .set('Accept', 'application/json')
            .expect(200)
            .end((err, res) => {
                expect(res.body).to.have.property("id");
                expect(res.body.id).to.not.equal(null);
                expect(res.body).to.have.property("firstName");
                expect(res.body.firstName).to.not.equal(null);
                expect(res.body).to.have.property("lastName");
                expect(res.body.lastName).to.not.equal(null);
                expect(res.body).to.have.property("streetAddress");
                expect(res.body.streetAddress).to.not.equal(null);
                expect(res.body).to.have.property("city");
                expect(res.body.city).to.not.equal(null);
                expect(res.body).to.have.property("state");
                expect(res.body.state).to.not.equal(null);
                expect(res.body).to.have.property("zipCode");
                expect(res.body.zipCode).to.not.equal(null);
                expect(res.body).to.have.property("phoneNumber");
                expect(res.body.phoneNumber).to.not.equal(null);
                expect(res.body).to.have.property("team_id");
                done();
            });
    });

    it('adds a new participant to the database', (done) => {
        api.post('/participants')
            .set('Accept', 'application/json')
            .send({
                firstName: faker.name.firstName(),
                lastName: faker.name.lastName(),
                emailAddress: faker.internet.email(),
                streetAddress: faker.address.streetAddress(),
                city: faker.address.city(),
                state: faker.address.state(),
                zipCode: faker.address.zipCode(),
                phoneNumber: faker.phone.phoneNumber(),
            })
            .expect('Content-Type', /json/)
            .expect(201)
            .end((err, res) => {
                done();
            });
    });

    it('verifies that the total number of participants increase after adding a new participant', (done) => {
        let originalLength;
        api.get('/participants')
            .set('Accept', 'application/json')
            .expect(200)
            .then((res) => {
                originalLength = res.body.length;
                return api.post('/participants')
                    .send({
                        firstName: faker.name.firstName(),
                        lastName: faker.name.lastName(),
                        emailAddress: faker.internet.email(),
                        streetAddress: faker.address.streetAddress(),
                        city: faker.address.city(),
                        state: faker.address.state(),
                        zipCode: faker.address.zipCode(),
                        phoneNumber: faker.phone.phoneNumber(),
                    })
                    .expect('Content-Type', /json/)
                    .expect(201)
                    .then((res) => {
                        api.get('/participants')
                            .set('Accept', 'application/json')
                            .expect(200)
                            .then((res) => {
                                expect(res.body.length).is.greaterThan(originalLength);
                                done();
                            });
                    });
            });
    });

    it('verifies that item is removed from the database', (done) => {
        api.post('/participants')
            .set('Accept', 'application/json')
            .send({
                firstName: faker.name.firstName(),
                lastName: faker.name.lastName(),
                emailAddress: faker.internet.email(),
                streetAddress: faker.address.streetAddress(),
                city: faker.address.city(),
                state: faker.address.state(),
                zipCode: faker.address.zipCode(),
                phoneNumber: faker.phone.phoneNumber(),
            })
            .expect('Content-Type', /json/)
            .expect(201)
            .then((res) => {
                var createdId = res.body.id;
                return api.delete('/participants/' + createdId)
                    .expect(204)
                    .then((res) => {
                        api.get('/participants/' + createdId)
                            .expect(404)
                            .then((res) => {
                                done();
                            });
                    });
            });
    });

    it('verifies that participants can be edited', (done) => {
        api.post('/participants')
            .set('Accept', 'application/json')
            .send({
                firstName: faker.name.firstName(),
                lastName: faker.name.lastName(),
                emailAddress: faker.internet.email(),
                streetAddress: faker.address.streetAddress(),
                city: faker.address.city(),
                state: faker.address.state(),
                zipCode: faker.address.zipCode(),
                phoneNumber: faker.phone.phoneNumber(),
            })
            .expect('Content-Type', /json/)
            .expect(201)
            .then((res) => {
                var createdId = res.body.id;
                var newEmail = "example@example.com"
                return api.patch('/participants/' + createdId)
                    .send({
                        emailAddress: newEmail
                    })
                    .expect(200)
                    .then((res) => {
                        api.get('/participants/' + createdId)
                            .expect(200)
                            .then((res) => {
                                expect(res.body.emailAddress).to.equal(newEmail);
                                done();
                            });
                    });
            });
    });
});

