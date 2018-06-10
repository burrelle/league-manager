var should = require('chai').should(),
    expect = require('chai').expect,
    supertest = require('supertest'),
    api = supertest('http://localhost:8000/api'), // league-manager.test
    faker = require('faker');

describe('Functional Test', () => {
    it('adds a participant to a team', (done) => {
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
                var number = res.body.id;
                api.post('/participants/' + number + '/add/1')
                    .set('Accept', 'application/json')
                    .expect(200)
                    .then(() => {
                        api.get('/participants/' + number)
                            .set('Accept', 'application/json')
                            .then((res) => {
                                expect(res.body.team_id).to.eq('1');
                                done();
                            });
                    });
            });
    });

    it('remove a participant to a team', (done) => {
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
                var number = res.body.id;
                api.post('/participants/' + number + '/remove/1')
                    .set('Accept', 'application/json')
                    .expect(200)
                    .then(() => {
                        api.get('/participants/' + number)
                            .set('Accept', 'application/json')
                            .then((res) => {
                                expect(res.body.team_id).to.eq(null);
                                done();
                            });
                    });
            });
    });

    it('adds a participant to a team and verifies that they are on the roster', (done) => {
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
                var number = res.body.id;
                api.post('/participants/' + number + '/add/1')
                    .set('Accept', 'application/json')
                    .expect(200)
                    .then(() => {
                        api.get('/teams/1/roster')
                            .set('Accept', 'application/json')
                            .then((res) => {
                                expect(res.body.length).to.be.at.least(1);
                                done();
                            });
                    });
            });
    });

    it('adds a captain to a team', (done) => {
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
                var number = res.body.id;
                api.post('/teams/1/captain/' + number)
                    .set('Accept', 'application/json')
                    .expect(200)
                    .then(() => {
                        api.get('/teams/1')
                            .set('Accept', 'application/json')
                            .then((res) => {
                                expect(res.body.captain).to.eq(number.toString());
                                done();
                            });
                    });
            });
    });

    it('removes a participant that is a captain', (done) => {
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
                var number = res.body.id;
                api.post('/teams/1/captain/' + number)
                    .set('Accept', 'application/json')
                    .expect(200)
                    .then(() => {
                        api.delete('/participants/' + number)
                            .set('Accept', 'application/json')
                            .expect(204)
                            .then(() => {
                                api.get('/teams/1')
                                    .set('Accept', 'application/json')
                                    .then((res) => {
                                        expect(res.body.captain).to.eq(null);
                                        done();
                                    });
                            })
                    });
            });
    });
});
