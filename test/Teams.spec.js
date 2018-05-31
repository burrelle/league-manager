var should = require('chai').should(),
    expect = require('chai').expect,
    supertest = require('supertest'),
    api = supertest('http://league-manager.test/api'), // localhost:8000
    faker = require('faker');

describe('Team Endpoints', () => {
    it("has at least ten teams after seeding the database", (done) => {
        api.get('/teams')
            .set('Accept', 'application/json')
            .expect(200)
            .end((err, res) => {
                expect(res.body.length).to.be.at.least(10);
                done();
            })
    });

    it('has the correct structure for a single team', (done) => {
        api.get('/teams/1')
            .set('Accept', 'application/json')
            .expect(200)
            .end((err, res) => {
                expect(res.body).to.have.property("id");
                expect(res.body.id).to.not.equal(null);
                expect(res.body).to.have.property("teamName");
                expect(res.body.teamName).to.not.equal(null);
                expect(res.body).to.have.property("captain");
                expect(res.body.captain).to.equal(null);
                expect(res.body).to.have.property("league");
                expect(res.body.league).to.not.equal(null);
                done();
            });
    });

    it('adds a new team to the database', (done) => {
        api.post('/teams')
            .set('Accept', 'application/json')
            .send({
                teamName: faker.company.companyName(),
                league: faker.random.word()
            })
            .expect('Content-Type', /json/)
            .expect(201)
            .end((err, res) => {
                done();
            });
    });

    it('verifies that the total number of teams increase after adding a new team', (done) => {
        let originalLength;
        api.get('/teams')
            .set('Accept', 'application/json')
            .expect(200)
            .then((res) => {
                originalLength = res.body.length;
                return api.post('/teams')
                    .send({
                        teamName: faker.company.companyName(),
                        league: faker.random.word()
                    })
                    .expect('Content-Type', /json/)
                    .expect(201)
                    .then((res) => {
                        api.get('/teams')
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
        api.post('/teams')
            .set('Accept', 'application/json')
            .send({
                teamName: faker.company.companyName(),
                league: faker.random.word()
            })
            .expect('Content-Type', /json/)
            .expect(201)
            .then((res) => {
                var createdId = res.body.id;
                return api.delete('/teams/' + createdId)
                    .expect(204)
                    .then((res) => {
                        api.get('/teams/' + createdId)
                            .expect(404)
                            .then((res) => {
                                done();
                            });
                    });
            });
    });

    it('verifies that a team can be edited', (done) => {
        api.post('/teams')
            .set('Accept', 'application/json')
            .send({
                teamName: faker.company.companyName(),
                league: faker.random.word()
            })
            .expect('Content-Type', /json/)
            .expect(201)
            .then((res) => {
                var createdId = res.body.id;
                var newTeamName = faker.company.companyName()
                return api.patch('/teams/' + createdId)
                    .send({
                        teamName: newTeamName
                    })
                    .expect(200)
                    .then((res) => {
                        api.get('/teams/' + createdId)
                            .expect(200)
                            .then((res) => {
                                expect(res.body.teamName).to.equal(newTeamName);
                                done();
                            });
                    });
            });
    });
});

