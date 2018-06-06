var should = require('chai').should(),
    expect = require('chai').expect,
    supertest = require('supertest'),
    api = supertest('http://localhost:8000/api'), // league-manager.test
    faker = require('faker');

describe('Functional Test', () => {
    it('adds a participant to a team', (done) => {
        api.post('/participants/1/add/1')
            .set('Accept', 'application/json')
            .expect(200)
            .then(()=>{
                api.get('/participants/1')
                    .set('Accept', 'application/json')
                    .then((res) => {
                        expect(res.body.team_id).to.eq('1');
                        done();
                    });
            });
    });

    it('remove a participant to a team', (done) => {
        api.post('/participants/1/remove/1')
            .set('Accept', 'application/json')
            .expect(200)
            .then(() => {
                api.get('/participants/1')
                    .set('Accept', 'application/json')
                    .then((res) => {
                        expect(res.body.team_id).to.eq(null);
                        done();
                    });
            });
    });

    it('adds a participant to a team and verifies that they are on the roster', (done) => {
        api.post('/participants/1/add/1')
            .set('Accept', 'application/json')
            .expect(200)
            .then(() => {
                api.get('/teams/1/roster')
                    .set('Accept', 'application/json')
                    .then((res) => {
                        expect(res.body[0].id).to.equal('1');
                        done();
                    });
            });
    });

    it('adds a captain to a team', (done) => {
        api.post('/teams/1/captain/1')
            .set('Accept', 'application/json')
            .expect(200)
            .then(() => {
                api.get('/teams/1')
                .set('Accept', 'application/json')
                .then((res) => {
                    expect(res.body.captain).to.eq('1');
                    done();
                });
            });
    });

    it('removes a participant that is a captain', (done) => {
        api.delete('/participants/1')
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