

describe('Articles api', () => {
  context('GET /api/actualites', () => {
      it('should return a list with all articles', () => {
          cy.request({
              method: 'GET',
              url: '/api/actualites'
          })
              .should((response) => {
                  cy.log(JSON.stringify(response.body))
                  expect(response.status).to.eq(200)
              });
      });
  });
});
