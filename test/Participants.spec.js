// Source: https://github.com/kathrynmbrown/node-api-testing-example/blob/master/test/test.js

var should = require('chai').should(),
expect = require('chai').expect,
supertest = require('supertest'),
api = supertest('http://localhost:8000/api');

describe('Participant Endpoints', () => {
	it("has 50 participants after seeding the database", () => {
		api.get('/participants')
		.set('Accept', 'application/json')
		.expect(200)
		.end((err, res) => {
			expect(res.body.length).to.be(50);
		});
	});
});
	